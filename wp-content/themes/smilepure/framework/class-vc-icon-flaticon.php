<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Smilepure_VC_Icon_Flaticon' ) ) {
	class Smilepure_VC_Icon_Flaticon {

		public function __construct() {
			/*
			 * Add styles & script file only on add new or edit post type.
			 */
			add_action( 'load-post.php', array( $this, 'enqueue_scripts' ) );
			add_action( 'load-post-new.php', array( $this, 'enqueue_scripts' ) );

			add_filter( 'vc_iconpicker-type-flaticon', array( $this, 'add_fonts' ) );
			add_filter( 'Smilepure_vc_icon_libraries', array( $this, 'add_to_libraries' ) );
			add_filter( 'Smilepure_vc_icon_libraries_fields', array( $this, 'add_icon_picker_field' ), 10, 2 );

			add_action( 'vc_enqueue_font_icon_element', array( $this, 'vc_element_enqueue' ) );
		}

		public function add_to_libraries( $list ) {
			$list = $list + array( esc_html__( 'Flaticon', 'smilepure' ) => 'flaticon' );

			return $list;
		}

		public function add_icon_picker_field( $fields, $args ) {
			$fields[] = array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'smilepure' ),
				'param_name'  => 'icon_flaticon',
				'value'       => 'flaticon-001-clock-1',
				'settings'    => array(
					'emptyIcon'    => true,
					'type'         => 'flaticon',
					'iconsPerPage' => 400,
				),
				'dependency'  => array(
					'element' => $args['param_name'],
					'value'   => 'flaticon',
				),
				'description' => esc_html__( 'Select icon from library.', 'smilepure' ),
			);

			return $fields;
		}


		public function vc_element_enqueue( $font ) {
			switch ( $font ) {
				case 'flaticon':
					wp_enqueue_style( 'font-flaticon', SMILEPURE_THEME_URI . '/assets/fonts/flaticon/font-flaticon.css', null, null );
					break;
			}
		}

		public function enqueue_scripts() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'font-flaticon', SMILEPURE_THEME_URI . '/assets/fonts/flaticon/font-flaticon.css', null, null );
		}

		public function add_fonts( $icons ) {
			$new_icons = array(
				array( 'flaticon-001-clock-1' => 'clock-1' ),
				array( 'flaticon-002-medicine-2' => 'medicine-2' ),
				array( 'flaticon-003-chat' => 'chat' ),
				array( 'flaticon-004-blood-sample-2' => 'sample-2' ),
				array( 'flaticon-005-blood-donation-3' => 'blood-donation-3' ),
				array( 'flaticon-006-cardiogram-8' => 'cardiogram-8' ),
				array( 'flaticon-007-calendar-3' => 'calendar-3' ),
				array( 'flaticon-008-ambulance-6' => 'ambulance-6' ),
				array( 'flaticon-009-cardiogram-7' => 'cardiogram-7' ),
				array( 'flaticon-010-mortar-2' => 'mortar-2' ),
				array( 'flaticon-011-atoms' => 'atoms' ),
				array( 'flaticon-012-calendar-2' => 'calendar-2' ),
				array( 'flaticon-013-blood-donation-2' => 'blood-donation-2' ),
				array( 'flaticon-014-clinic-history-8' => 'clinic-history-8' ),
				array( 'flaticon-015-blood-donation-1' => 'blood-donation-1' ),
				array( 'flaticon-016-doctor-1' => 'doctor-1' ),
				array( 'flaticon-017-molecules' => 'molecules' ),
				array( 'flaticon-018-scale-1' => 'scale-1' ),
				array( 'flaticon-019-skull' => 'skull' ),
				array( 'flaticon-020-hospital-bed-1' => 'hospital-bed-1' ),
				array( 'flaticon-021-hospital-9' => 'hospital-9' ),
				array( 'flaticon-022-fish' => 'fish' ),
				array( 'flaticon-023-knife' => 'knife' ),
				array( 'flaticon-024-spermatozoon' => 'spermatozoon' ),
				array( 'flaticon-025-printer' => 'printer' ),
				array( 'flaticon-026-bones' => 'bones' ),
				array( 'flaticon-027-stomach' => 'stomach' ),
				array( 'flaticon-028-cardiogram-6' => 'cardiogram-6' ),
				array( 'flaticon-029-stretcher-1' => 'stretcher-1' ),
				array( 'flaticon-030-clinic-history-7' => 'clinic-history-7' ),
				array( 'flaticon-031-scanner' => 'scanner' ),
				array( 'flaticon-032-laptop-3' => 'laptop-3' ),
				array( 'flaticon-033-scale' => 'scale' ),
				array( 'flaticon-034-folder' => 'folder' ),
				array( 'flaticon-035-clinic-history-6' => 'clinic-history-6' ),
				array( 'flaticon-036-hospital-8' => 'hospital-8' ),
				array( 'flaticon-037-tablets' => 'tablets' ),
				array( 'flaticon-038-medicine-book-1' => 'medicine-book-1' ),
				array( 'flaticon-039-emergency-call-1' => 'emergency-call-1' ),
				array( 'flaticon-040-placeholder' => 'placeholder' ),
				array( 'flaticon-041-helicopter' => 'helicopter' ),
				array( 'flaticon-042-hospital-7' => 'hospital-7' ),
				array( 'flaticon-043-dropper-1' => 'dropper-1' ),
				array( 'flaticon-044-dumbbell' => 'dumbbell' ),
				array( 'flaticon-045-molecule' => 'molecule' ),
				array( 'flaticon-046-cardiogram-5' => 'scannflaticon-046-cardiogram-5er' ),
				array( 'flaticon-047-head' => 'head' ),
				array( 'flaticon-048-lungs' => 'lungs' ),
				array( 'flaticon-049-glasses' => 'glasses' ),
				array( 'flaticon-050-mortar-1' => 'mortar-1' ),
				array( 'flaticon-051-emergency-call' => 'emergency-call' ),
				array( 'flaticon-052-flask-2' => 'flask-2' ),
				array( 'flaticon-053-medical-history' => 'medical-history' ),
				array( 'flaticon-054-ambulance-5' => 'ambulance-5' ),
				array( 'flaticon-055-calendar-1' => 'calendar-1' ),
				array( 'flaticon-056-first-aid-kit-5' => 'first-aid-kit-5' ),
				array( 'flaticon-057-crutch' => 'crutch' ),
				array( 'flaticon-058-blood-transfusion-2' => 'blood-transfusion-2' ),
				array( 'flaticon-059-ambulance-4' => 'ambulance-4' ),
				array( 'flaticon-060-cardiogram-4' => 'cardiogram-4' ),
				array( 'flaticon-061-nuclear-1' => 'nuclear-1' ),
				array( 'flaticon-062-cardiogram-3' => 'cardiogram-3' ),
				array( 'flaticon-063-thermometer-2' => 'thermometer-2' ),
				array( 'flaticon-064-hospital-6' => 'hospital-6' ),
				array( 'flaticon-065-hospital-bed' => 'hospital-bed' ),
				array( 'flaticon-066-cardiogram-2' => 'cardiogram-2' ),
				array( 'flaticon-067-clinic-history-5' => 'clinic-history-5' ),
				array( 'flaticon-068-ambulance-3' => 'ambulance-3' ),
				array( 'flaticon-069-test-tube' => 'test-tube' ),
				array( 'flaticon-070-first-aid-kit-4' => 'first-aid-kit-4' ),
				array( 'flaticon-071-clipboard-2' => 'clipboard-2' ),
				array( 'flaticon-072-hospital-5' => 'hospital-5' ),
				array( 'flaticon-073-laptop-2' => 'laptop-2' ),
				array( 'flaticon-074-laptop-1' => 'laptop-1' ),
				array( 'flaticon-075-cardiogram-1' => 'cardiogram-1' ),
				array( 'flaticon-076-microscope' => 'microscope' ),
				array( 'flaticon-077-ribbon' => 'ribbon' ),
				array( 'flaticon-078-patch-2' => 'patch-2' ),
				array( 'flaticon-079-safebox' => 'safebox' ),
				array( 'flaticon-080-shield' => 'shield' ),
				array( 'flaticon-081-dropper' => 'dropper' ),
				array( 'flaticon-082-pills-3' => 'pills-3' ),
				array( 'flaticon-083-stethoscope' => 'stethoscope' ),
				array( 'flaticon-084-pills-2' => 'pills-2' ),
				array( 'flaticon-085-blood-sample-1' => 'blood-sample-1' ),
				array( 'flaticon-086-flask-1' => 'flask-1' ),
				array( 'flaticon-087-glass-of-water' => 'glass-of-water' ),
				array( 'flaticon-088-injection-1' => 'injection-1' ),
				array( 'flaticon-089-blood-transfusion-1' => 'blood-transfusion-1' ),
				array( 'flaticon-090-vaccine' => 'vaccine' ),
				array( 'flaticon-091-no-smoking' => 'no-smoking' ),
				array( 'flaticon-092-clock' => 'clock' ),
				array( 'flaticon-093-pills-1' => 'pills-1' ),
				array( 'flaticon-094-blood-drop-1' => 'blood-drop-1' ),
				array( 'flaticon-095-patch-1' => 'patch-1' ),
				array( 'flaticon-096-calendar' => 'calendar' ),
				array( 'flaticon-097-flask' => 'flask' ),
				array( 'flaticon-098-blood-drop' => 'blood-drop' ),
				array( 'flaticon-099-first-aid-kit-3' => 'first-aid-kit-3' ),
				array( 'flaticon-100-voltmeter' => 'voltmeter' ),
				array( 'flaticon-101-cardiogram' => 'cardiogram' ),
				array( 'flaticon-102-hospital-4' => 'hospital-4' ),
				array( 'flaticon-103-nuclear' => 'nuclear' ),
				array( 'flaticon-104-blood-sample' => 'blood-sample' ),
				array( 'flaticon-105-first-aid-kit-2' => 'first-aid-kit-2' ),
				array( 'flaticon-106-first-aid-kit-1' => 'first-aid-kit-1' ),
				array( 'flaticon-107-medicine-1' => 'medicine-1' ),
				array( 'flaticon-108-hospital-3' => 'hospital-3' ),
				array( 'flaticon-109-injection' => 'injection' ),
				array( 'flaticon-110-hospital-2' => 'hospital-2' ),
				array( 'flaticon-111-ambulance-2' => 'ambulance-2' ),
				array( 'flaticon-112-mortar' => 'mortar' ),
				array( 'flaticon-113-clinic-history-4' => 'clinic-history-4' ),
				array( 'flaticon-114-pill' => 'pill' ),
				array( 'flaticon-115-ambulance-1' => 'ambulance-1' ),
				array( 'flaticon-116-patch' => 'patch' ),
				array( 'flaticon-117-stretcher' => 'stretcher' ),
				array( 'flaticon-118-blood-transfusion' => 'blood-transfusion' ),
				array( 'flaticon-119-clipboard-1' => 'clipboard-1' ),
				array( 'flaticon-120-monitor-1' => 'monitor-1' ),
				array( 'flaticon-121-smartphone-4' => 'smartphone-4' ),
				array( 'flaticon-122-clinic-history-3' => 'clinic-history-3' ),
				array( 'flaticon-123-smartphone-3' => 'smartphone-3' ),
				array( 'flaticon-124-laptop' => 'laptop' ),
				array( 'flaticon-125-clinic-history-2' => 'clinic-history-2' ),
				array( 'flaticon-126-medicine' => 'medicine' ),
				array( 'flaticon-127-thermometer-1' => 'thermometer-1' ),
				array( 'flaticon-128-thermometer' => 'thermometer' ),
				array( 'flaticon-129-hospital-1' => 'hospital-1' ),
				array( 'flaticon-130-clinic-history-1' => 'clinic-history-1' ),
				array( 'flaticon-131-venus' => 'venus' ),
				array( 'flaticon-132-medicine-book' => 'medicine-book' ),
				array( 'flaticon-133-smartphone-2' => 'smartphone-2' ),
				array( 'flaticon-134-smartphone-1' => 'smartphone-1' ),
				array( 'flaticon-135-hospital' => 'hospital' ),
				array( 'flaticon-136-monitor' => 'monitor' ),
				array( 'flaticon-137-doctor' => 'doctor' ),
				array( 'flaticon-138-loupe' => 'loupe' ),
				array( 'flaticon-139-first-aid-kit' => 'first-aid-kit' ),
				array( 'flaticon-140-healthcare' => 'healthcare' ),
				array( 'flaticon-141-clinic-history' => 'clinic-history' ),
				array( 'flaticon-142-ambulance' => 'ambulance' ),
				array( 'flaticon-143-teeth' => 'teeth' ),
				array( 'flaticon-144-blood-donation' => 'blood-donation' ),
				array( 'flaticon-145-flag' => 'flag' ),
				array( 'flaticon-146-archive' => 'archive' ),
				array( 'flaticon-147-pills' => 'pills' ),
				array( 'flaticon-148-smartphone' => 'smartphone' ),
				array( 'flaticon-149-bottle' => 'bottle' ),
				array( 'flaticon-150-clipboard' => 'clipboard' ),
			);

			return array_merge( $icons, $new_icons );
		}
	}

	new Smilepure_VC_Icon_Flaticon();
}
