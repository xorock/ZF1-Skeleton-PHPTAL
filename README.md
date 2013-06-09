ZF1-Skeleton-PHPTAL
===================

Zend Framework skeleton application with individual modules and PHPTAL as default view.

Included packages:

* Zend Framework 1.12.3
* ZTAL and PHPTAL
* ZFDebug

## Install

Download package, copy index.php from */www* to web accessible folder (htdocs, public_html, etc.). Other files **should not** be available from the outside.
Depending on the server configuration, chmod all files so that only PHP process can access them (chmod o-rwx, chown www-user:www-user).
*/temp* and */data/logs/* directories should be writable.

By default Zend router does not require mod_rewrite-like functionality. You could simply type http://localhost/index.php and all routes will be transformed properly. Please refer to http://framework.zend.com/manual/1.12/en/zend.controller.router.html 


## External links

* http://framework.zend.com/
* http://phptal.org/
* https://github.com/namesco/ZTal
* https://github.com/jokkedk/ZFDebug