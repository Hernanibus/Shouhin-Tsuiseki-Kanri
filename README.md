# domain-user-control
 This web application is base on <b>domain-user-control</b> web application for controlling access to other web application functionality.

Then access is granted depending on a combination of domain, user name and password. Every user has a "profile". The usage of quotes here refer to the fact that there is no profile per se, but every user has what it is called in the data base 'applications' and each application defines or not a 'range'.

Those applications are defined separately and accessed only by those with special privilages.

The usage of domain for the access is optional, by setting the constant DOMAIN_CONTROL_USE on the configuration file. The usage of ranges for the acces is optional, by setting the constant RANGE_USE on the configuration file.

Application 00001 is reserved for super administrator, that is independent of domain and absolute.
