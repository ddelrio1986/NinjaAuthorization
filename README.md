NinjaAuthorization
------------------

This is a ZF2 module that will provide an authorization layer to a ZF2 application. It offers functionality for persisting a Zend\Permisions\Acl implementation to the database, loading the ACL for a given user ID, and querying against the ACL for the currently authenticated user.

This module uses the Doctrine2 ORM and the NinjaServiceLayer package in order to setup a basis for a service layer.

It provides some example SQL that can be used to add the necessary tables to your database. It also provided an entity interface for your User entity so you'll want to make sure you User entity conforms to it.

The best way to integrate is to create your own entities that extends the abstract entities provided in this plugin and then used the Doctrine target entity resolver to make sure that your entities are used. It also best to create your own services which extend the ones provided here with the exception of the ACL service. It is fine to use that one directly.
