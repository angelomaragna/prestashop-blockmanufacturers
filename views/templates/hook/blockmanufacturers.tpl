{*
* This code is developed by Angelo Maragna and released
* under mit license (https://opensource.org/licenses/MIT)
*
*  @author NG Italy di Angelo Maragna <info@ngitaly.com>
*  @copyright  released under MIT license
*  @license  https://opensource.org/licenses/MIT
*
*}

	<!-- Block manufacturers module -->
	<div id="manufacturers_block_left" class="block">
		<h4 class="title_block">{if isset($currentCategory)}{$currentCategory->name|escape}{else}{l s='manufacturers' mod='blockmanufacturers'}{/if}</h4>
		<div class="block_content">
			<ul class="tree {if $isDhtml}dhtml{/if}">
				{foreach from=$blockCategTree.children item=child name=blockCategTree}
					{if $smarty.foreach.blockCategTree.last}
						{include file="$branche_tpl_path" node=$child last='true'}
					{else}
						{include file="$branche_tpl_path" node=$child}
					{/if}
				{/foreach}
			</ul>
			{* Javascript moved here to fix bug #PSCFI-151 *}
			<script type="text/javascript">
				// <![CDATA[
				// we hide the tree only if JavaScript is activated
				$('div#manufacturers_block_left ul.dhtml').hide();
				// ]]>
			</script>
		</div>
	</div>
	<!-- /Block manufacturers module -->

