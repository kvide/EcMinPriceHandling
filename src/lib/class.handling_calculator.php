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

namespace EcMinPriceHandling;

class handling_calculator implements \EcommerceExt\Handling\handling_calculator
{

    private $_mod;

    public function __construct(\EcMinPriceHandling $mod)
    {
        $this->_mod = $mod;
    }

    public function GetName()
    {
        return $this->_mod->GetName();
    }

    function IsConfigured()
    {
        $handlingamt = (float) $this->_mod->GetPreference('handlingamt', 0.0);
        $maxorderamt = (float) $this->_mod->GetPreference('maxorderamt', 0.0);
        if ($handlingamt > 0.0001 && $maxorderamt > 0.0001)
        {
            return TRUE;
        }
    }

    /**
     * Returns an array of 2 elements
     * first element is the price
     * second element is the line item description
     */
    function calculate_handling(array $cart_items)
    {
        if (! $this->IsConfigured())
        {
            return;
        }
        if (! count($cart_items))
        {
            return;
        }

        $subtotal = 0;
        foreach ($cart_items as $item)
        {
            $subtotal += $item->get_item_total();
        }
        $handlingamt = (float) $this->_mod->GetPreference('handlingamt', 0.0);
        $maxorderamt = (float) $this->_mod->GetPreference('maxorderamt', 0.0);
        if ($subtotal >= $maxorderamt)
        {
            return;
        }

        $tmp = $this->_mod->GetPreference('lineitemdesc');
        if (! $tmp)
            $tmp = $this->_mod->Lang('line_item');

        return array($handlingamt, $tmp);
    }

} // end of class

?>
