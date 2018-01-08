<?php

/**
 * 实例详情
 * @author auto create
 */
class ProcessInstanceTopVo
{
	
	/** 
	 * 审批人
	 **/
	public $approver_userids;
	
	/** 
	 * 审批实例业务编号
	 **/
	public $business_id;
	
	/** 
	 * 抄送人
	 **/
	public $cc_userids;
	
	/** 
	 * 开始时间
	 **/
	public $create_time;
	
	/** 
	 * 结束时间
	 **/
	public $finish_time;
	
	/** 
	 * 表单详情列表
	 **/
	public $form_component_values;
	
	/** 
	 * 操作记录列表
	 **/
	public $operation_records;
	
	/** 
	 * 发起部门
	 **/
	public $originator_dept_id;
	
	/** 
	 * 发起部门
	 **/
	public $originator_dept_name;
	
	/** 
	 * 发起人
	 **/
	public $originator_userid;
	
	/** 
	 * 审批结果，分为agree和refuse
	 **/
	public $result;
	
	/** 
	 * 审批状态，分为NEW（刚创建）|RUNNING（运行中）|TERMINATED（被终止）|COMPLETED（完成）|CANCELED（取消）
	 **/
	public $status;
	
	/** 
	 * 任务列表
	 **/
	public $tasks;
	
	/** 
	 * 审批实例标题
	 **/
	public $title;	
}
?>