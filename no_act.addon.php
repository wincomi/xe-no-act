<?php
/**
 * @file no_act.addon.php
 * @author Wincomi (admin@wincomi.com)
 * @brief No Act!
 * */

if(!defined('__XE__'))
	exit();

if(($called_position == 'before_module_proc' || $called_position == 'after_module_proc') && Context::get('module') != 'admin')
{
	if ($addon_info->except_admin == 'Y' && $logged_info->is_admin == 'Y') return;
	$act_array = explode(",",$addon_info->act_list);
	if (in_array($this->act, array_map('trim',$act_array))) {
		$this->act = null;
		if (!$addon_info->msg)
			$addon_info->msg = $addon_info->msg_custom;
		return $this->stop($addon_info->msg);
	}
}

/* End of file no_act.addon.php */
/* Location: ./addons/no_act/no_act.addon.php */