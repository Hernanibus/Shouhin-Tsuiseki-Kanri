# domain-user-control
 Web application for controlling acces to other web apps

web application for controlling acces to other web apps, depending on combination of domain, user name and password. Every user has a "profile". The usage of quotes here refer to the fact that there is no profile per se, but every user has what it is called in the data base 'applications' and each application defines or not a 'range'.

The usage of domain for the access is optional, by setting the constant DOMAIN_CONTROL_USE on the configuration file. The usage of ranges for the acces is optional, by setting the constant RANGE_USE on the configuration file.

Application 00001 is reserved for super administrator, that is independent of domain and absolute.
