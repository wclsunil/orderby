Install by uploading files:

Please extract the module zip you have

please create the folder "app/code/WilliamsCommerce/OrderBy" and copy all files which you have in OrderBy to that folder.


Then you open a terminal application, change to magento root directory and use command line :

cd [magento 2 root folder]

php bin/magento setup:upgrade


Wait a second to complete installation process:

then run php bin/magento setup:di:compile

then run php bin/magento setup:static-content:deploy en_GB en_US -f

and then run 
php bin/magento cache:flush

Finally, coming back to Magento 2 admin to check if Order Created By sub menu is visible under Admin->Sales