<?php

# BEGIN_LICENSE
# -------------------------------------------------------------------------
# Module: EcMinPriceHandling (c) 2024 by CMS Made Simple Foundation
#
# A handling module for the EcommerceExt extension that allows
# charging a handling fee for orders that do not meet a minimum total.
#
# -------------------------------------------------------------------------
# A fork of:
#
# Module: MinPriceHandling (c) 2014-2017 by Robert Campbell
# (calguy1000@cmsmadesimple.org)
#
# -------------------------------------------------------------------------
#
# CMSMS - CMS Made Simple is (c) 2006 - 2024 by CMS Made Simple Foundation
# CMSMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS Homepage at: http://www.cmsmadesimple.org
#
# -------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple. You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
# -------------------------------------------------------------------------
# END_LICENSE

class EcMinPriceHandling extends \CMSMSExt\XTModule
{
    private $_helper;

    function GetName()
    {
        return get_class($this);
    }

    function GetFriendlyName()
    {
        return $this->Lang('friendlyname');
    }

    function GetVersion()
    {
        return '0.98.0';
    }

    function GetAuthor()
    {
        return 'Christian Kvikant';
    }

    public function GetAuthorEmail()
    {
        return 'kvide@kvikant.fi';
    }

    function IsPluginModule()
    {
        return TRUE;
    }

    function HasAdmin()
    {
        return TRUE;
    }

    function GetAdminSection()
    {
        return 'ecommerce';
    }

    function GetAdminDescription()
    {
        return $this->Lang('moddescription');
    }

    function VisibleToAdminUser()
    {
        return $this->CheckPermission('Modify Site Preferences');
    }

    public function GetDependencies()
    {
        return array(
            'CMSMSExt' => '1.4.5',
            'EcommerceExt' => '0.98.0'
        );
    }

    function MinimumCMSVersion()
    {
        return '2.2.19';
    }

    function IsHandlingModule()
    {
        return TRUE;
    }

    function InstallPostMessage()
    {
        return $this->Lang('postinstall');
    }

    function UninstallPostMessage()
    {
        return $this->Lang('postuninstall');
    }

    function UninstallPreMessage()
    {
        return $this->Lang('really_uninstall');
    }

    public function get_handling_calculator()
    {
        if (! $this->_helper)
        {
            $this->_helper = new \EcMinPriceHandling\handling_calculator($this);
        }

        return $this->_helper;
    }

} // end of class

#
# EOF
#
?>