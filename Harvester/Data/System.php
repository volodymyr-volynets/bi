<?php

namespace Numbers\BI\Harvester\Data;
class System extends \Object\Import {
	public $data = [
		'controllers' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::\Numbers\BI\Harvester\Controller\Schedule',
					'sm_resource_code' => '\Numbers\BI\Harvester\Controller\Schedule',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Settings',
					'sm_resource_name' => 'H/9 Schedule (Task)',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'far fa-sun',
					'sm_resource_module_code' => 'H9',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Business Intelligence',
					'sm_resource_group3_name' => 'Harvester',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [
						[
							'sm_rsrcftr_feature_code' => 'H9::HARVESTER',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => [
						[
							'sm_rsrcmp_method_code' => 'AllActions',
							'sm_rsrcmp_action_id' => '::id::All_Actions',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_View',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'Edit',
							'sm_rsrcmp_action_id' => '::id::Record_Edit',
							'sm_rsrcmp_inactive' => 0
						],
					]
				],
				[
					'sm_resource_id' => '::id::\Numbers\BI\Harvester\Controller\QuickView',
					'sm_resource_code' => '\Numbers\BI\Harvester\Controller\QuickView',
					'sm_resource_type' => 100,
					'sm_resource_classification' => 'Reports',
					'sm_resource_name' => 'H/9 Quick View',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-table',
					'sm_resource_module_code' => 'H9',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Business Intelligence',
					'sm_resource_group3_name' => 'Harvester',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [
						[
							'sm_rsrcftr_feature_code' => 'H9::HARVESTER',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => [
						[
							'sm_rsrcmp_method_code' => 'Index',
							'sm_rsrcmp_action_id' => '::id::Report_View',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
			]
		],
		'menu' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::\Menu\Operations\Business\Intelligence',
					'sm_resource_code' => '\Menu\Operations\Business\Intelligence',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Business Intelligence',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-window-restore',
					'sm_resource_module_code' => 'BI',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Operations\Business\Intelligence\Harvester',
					'sm_resource_code' => '\Menu\Operations\Business\Intelligence\Harvester',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Harvester',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-tractor',
					'sm_resource_module_code' => 'BI',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Business Intelligence',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\BI\Harvester\Controller\Schedule',
					'sm_resource_code' => '\Menu\Numbers\BI\Harvester\Controller\Schedule',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Schedule (Task)',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'far fa-sun',
					'sm_resource_module_code' => 'H9',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Business Intelligence',
					'sm_resource_group3_name' => 'Harvester',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\BI\Harvester\Controller\Schedule',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::List_View',
					'sm_resource_menu_url' => '/Numbers/BI/Harvester/Controller/Schedule/_Edit',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::\Menu\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
					'sm_resource_code' => '\Menu\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Quick View',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'fas fa-table',
					'sm_resource_module_code' => 'H9',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Business Intelligence',
					'sm_resource_group3_name' => 'Harvester',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::\Numbers\BI\Harvester\Controller\QuickView',
					'sm_resource_menu_acl_method_code' => 'Index',
					'sm_resource_menu_acl_action_id' => '::id::Report_View',
					'sm_resource_menu_url' => '/Numbers/BI/Harvester/Controller/QuickView',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
			]
		]
	];
}