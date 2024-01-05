# EcMinPriceHandling

This is a fork of the MinPriceHandling module for [CMS Made Simple](https://www.cmsmadesimple.org/) EcommerceExt
module for CMS Made Simple.. The module can co-exist and will not interfere with systems that us  the original
MinPriceHandling module, intended to be used with CGEcommerceBase.

## Installing

The module requires that the latest versions of CMSMSExt (v1.4.5) modules are installed on the server.

Download and unzip the latest EcMinPriceHandling-x.x.x.xml.zip from [releases](../../releases). Use CMSMS's Module
Manager to upload the unzipped XML file to your server.

The module will only install on servers running CMSMS v2.2.19 on PHP 8.0 or newer. The software may run on older
versions of CMSMS or PHP, but the checks in MinimumCMSVersion() and method.install.php would need to be tweaked.

## Using the module

The module can be used as component providing additional handling cost calculations to CMSMS
EcommerceExt](../../../EcommerceExt) E-commerce extension or it can be used as a coding template for more advanced
pricing calculations, like applying additional Hazmat fees etc.
