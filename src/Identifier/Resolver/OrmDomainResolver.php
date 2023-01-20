<?php

  namespace App\Identifier\Resolver;

  use Authentication\Identifier\Resolver\ResolverInterface;
  use Cake\Core\Configure;
  use Cake\Core\InstanceConfigTrait;
  use Cake\ORM\Locator\LocatorAwareTrait;
  use App\Model\Entity\AdmApplication;

  define( 'TYPE_APPLICATION', Configure::read('DomainUserControl.TYPE_APPLICATION' ) );

  define( 'USER_NAME_FIELD_ALIAS', Configure::read('DomainUserControl.userNameFiledName' ) );
  define( 'DOMAIN_NAME_FIELD_ALIAS', Configure::read('DomainUserControl.domainNameFiledName' ) );

  class OrmDomainResolver implements \Authentication\Identifier\Resolver\ResolverInterface
  {
    use InstanceConfigTrait;
    use LocatorAwareTrait;
    /**
     * @inheritDoc
     */
    public function find( array $conditions, string $type = self::TYPE_AND )
    {
        $users_table    = $this->getTableLocator()->get( Configure::read('DomainUserControl.userModel' ) );

        $apps_table     = $this->getTableLocator()->get( Configure::read('DomainUserControl.applicationsModel' ) );
        $hier_table     = $this->getTableLocator()->get( Configure::read('DomainUserControl.hierarchiesModel' ) );
        $apps_axerray   = $this->getTableLocator()->get( Configure::read('DomainUserControl.appXhierModel' ) );

        //---------- Operation to treat Login Form data   -------------
        //On use domain, non domain usernames are an invalid login (user name has no @ or domain not found)
        $domain                     = $this->extractDomain( $conditions );
        if( Configure::read('DomainUserControl.useDomain' ) && empty( $domain ) ){ return null; }
        $where                      = $this->getConditionForUserName( $conditions );
        //-------------------------------------------------------------

        //Condition for Domain only applies if we are using domain
        if( Configure::read('DomainUserControl.useDomain' ) ){ $where[ 'adm_domain_id' ] = $domain->id;}
        $user                       = $users_table->query()->where( [ $type => $where ] )->first();//'adm_domain', //->contain( [ 'adm_hierarchy' ] )
        //----  User not found
        if( empty( $user ) ){ return $user; }




        //---- User found; adding extra information
        $user->user_dom             = $domain;
        //---- Applications corresponding to user; There must be always at least one
        $h                          = $hier_table->find( 'children', [ 'for' => $user->adm_hierarchy_id ] )
                                                 ->where( [ 'type' => TYPE_APPLICATION ] );//will be an array of hierarchies
        $apps_array                 = [];
        foreach( $h as $hierarchy )
        {
            $hApps                      = $apps_axerray->find()->where( [ 'adm_hierarchy_id' => $hierarchy->id ] )->first();
            //Must be first even though there is only one
            $user_application           = $apps_table->find()->where( [ 'id' => $hApps->adm_application_id ] )->first();
            //----- Adding ranges to the corresponding applications if applicable
            if( Configure::read('DomainUserControl.useRange' ) && $user_application->uses_range )
                { $user_application = $apps_table->setApplicationRange( $user_application, $hierarchy ); }
            $apps_array[]               = $user_application;
        }
        $user->user_apps            = $apps_array;


        return $user;
    }

    /**
    * @param array $fields_data An array of fields and values from login form to be used in the search.
    * @return ?\App\Model\Entity\AdmDomain The domain object or null of domain is not used for login.
    */
    private function extractDomain( array $fields_data ):?\App\Model\Entity\AdmDomain
    {
        if( !Configure::read('DomainUserControl.useDomain' ) ){ return null; }

        $dom_table      = $this->getTableLocator()->get( Configure::read('DomainUserControl.domModel' ) );

        $domain         = null;
        foreach( $fields_data as $field => $value )
        {
            if( $field === USER_NAME_FIELD_ALIAS && strpos( $value, '@' ) )
            {
                $domain_field   = [ DOMAIN_NAME_FIELD_ALIAS => explode( '@', $value )[1] ];
                $domain         = $dom_table->query()->where( $domain_field )->first();
                break;
            }
        }
        return $domain;
    }
    /**
    * @param array $fields_data An array of fields and values from login form to be used in the search.
    * @return array Values are where conditions to be used in find method
    */
    private function getConditionForUserName( array $fields_data ):array
    {
        $where          = [];
        foreach( $fields_data as $field => $value )
        {
            if( $field === USER_NAME_FIELD_ALIAS )
            {
                if( Configure::read( 'DomainUserControl.useDomain' ) && strpos( $value, '@' ) )
                    { $where[ USER_NAME_FIELD_ALIAS ] = explode( '@', $value )[ 0 ]; }
                else
                    { $where[ USER_NAME_FIELD_ALIAS ] = $value; }
                break;
            }
        }
        return $where;
    }
  }
