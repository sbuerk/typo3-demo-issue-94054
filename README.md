#  Demo: #94054 TYPO3 Backend-Login fails if Typo3 is installed in a subdirectory of the domain

## Description

This is a small demonstration / playground to verify/check the root htaccess file of Typo3
v11/master for issue #94054.

## Setup

Setup two apache2 vhosts:

1. DOCROOT: $( PWD )/subfolder DOMAIN: https://root.htaccess-playground.test 
2. DOCROOT: $( PWD )/          DOMAIN: https://subfolder.htaccess-playground.test/subfolder

Adjust schema and domainname, ensure thes resolves to the apache2 server.
If you use other names, adjust them in `test.php`

## Run

Execute `test.php` with php7.2+ from commandline (or from the subfolder domain):

    $ php test.php
    $ curl https://subfolder.htaccess-playground.test/test.php

Test iterates to different root htaccess files, checking against root/subfolder install with
several FE/BE uris checking context retrieved by corresponding `index.php`    

## Results

```
---------------------------------------------------------------------------------------------
Using root-htaccess-master

[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/index.php
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index.php
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/index.php
[FAIL][EXP: BE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard
[FAIL][EXP: BE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index.php
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3/

---------------------------------------------------------------------------------------------
Using root-htaccess-dollar-zero

[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/index.php
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index.php
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/index.php
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index.php
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3/

---------------------------------------------------------------------------------------------
Using root-htaccess-removed-duplicate

[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/index.php
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard
[ OK ][EXP: BE][CON: BE] https://root.htaccess-playground.test/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index/
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/index.php
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://root.htaccess-playground.test/virtual/products/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/index.php
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard
[ OK ][EXP: BE][CON: BE] https://subfolder.htaccess-playground.test/subfolder/typo3/module/dashboard/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index/
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/index.php
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3
[ OK ][EXP: FE][CON: FE] https://subfolder.htaccess-playground.test/subfolder/virtual/products/typo3/
```