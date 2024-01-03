{$formstart}
<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}setashandling" value="{$mod->Lang('setashandling')}"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_lineitemdesc')}</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}lineitemdesc" value="{$lineitemdesc}" size="50"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_handlingamt')}</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}handlingamt" value="{$handlingamt}"/> {ecomm_currency_symbol} {ecomm_currency_code}
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_maxorderamt')}</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}maxorderamt" value="{$maxorderamt}"/> {ecomm_currency_symbol} {ecomm_currency_code}
  </p>
</div>
{$formend}