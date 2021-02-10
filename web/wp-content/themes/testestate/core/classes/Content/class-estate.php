<?php
/**
 * Estate content type and fucntions.
 *
 * @package TestEstate\Content
 */

namespace TestEstate\Content;

/**
 * Class to setup and handle custom post type.
 */
class Estate {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Register CPT and related taxonomies.
	 */
	public function register() {

		$labels = array(
			'attributes'            => '... Attributes',
			'parent_item_colon'     => 'Parent ...:',
			'all_items'             => 'Все Объекты',
			'add_new_item'          => 'Добавить новый объект',
			'add_new'               => 'Добавить новый',
			'new_item'              => 'Новый объект',
			'edit_item'             => 'Изменить объект',
			'update_item'           => 'Обновить объект',
			'view_item'             => 'Просмотр объекта',
			'view_items'            => 'Смотреть объекы',
			'search_items'          => 'Найти объект',
			'not_found'             => 'Не найден',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Основное изображение',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Вставить в объект',
			'uploaded_to_this_item' => 'Uploaded to this объект',
			'items_list'            => 'Список объектов',
			'items_list_navigation' => 'Rules list navigation',
			'filter_items_list'     => 'Фильтровать',
		);

		$args = array(
			'labels'                => $labels,
			'supports'              => array( 'title', 'revisions', 'custom-fields' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 23,
			'menu_icon'             => 'dashicons-building',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);

		$label['name'] = 'Объекты недвижимости';
		$label['singular_name'] = 'Объект недвижимости';
		$label['menu_name'] = 'Объекты недвижимости';
		$label['name_admin_bar'] = 'Объекты недвижимости';
		$label['archives'] = 'Объекты недвижимости';

		$args['label'] = 'Объекты недвижимости';
		$args['description'] = 'Объекты недвижимости';
		$args['rewrite'] = [ 'slug' => 'object' ];

		register_post_type( 'estate', $args );

		/**
		 * Register 'Estate Type' taxonomy.
		 */
		$labels = array(
			'name'                       => 'Тип объекта',
			'singular_name'              => 'Тип объекта',
			'menu_name'                  => 'Типы объектов',
			'all_items'                  => 'Все типы',
			'parent_item'                => 'Родитель',
			'new_item_name'              => 'Название нового типа',
			'add_new_item'               => 'Добавить новый тип',
			'edit_item'                  => 'Изменить',
			'update_item'                => 'Обновить',
			'view_item'                  => 'Просмотреть',
			'separate_items_with_commas' => 'Separate items with commas',
			'add_or_remove_items'        => 'Добавить или удалить',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Categories',
			'search_items'               => 'Поиск',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No items',
			'items_list'                 => 'Список типов',
			'items_list_navigation'      => 'Навигация по списку',
		);
		$rewrite = array(
			'slug'                       => 'type',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'estste-type', array( 'estate' ), $args );

		/**
		 * Register 'City' taxonomy.
		 *
		 * В рамках текущего задания решил сделать так. Ибо быстрее и проще, а ТЗ допускает.
		 * А можно было бы через отдельный post type и использовать, например, Relationship Field из ACF.
		 */
		$labels = array(
			'name'                       => 'Города',
			'singular_name'              => 'Город',
			'menu_name'                  => 'Города',
			'all_items'                  => 'Все города',
			'parent_item'                => 'Родитель',
			'new_item_name'              => 'Название нового города',
			'add_new_item'               => 'Добавить новый город',
			'edit_item'                  => 'Изменить',
			'update_item'                => 'Обновить',
			'view_item'                  => 'Просмотреть',
			'separate_items_with_commas' => 'Separate items with commas',
			'add_or_remove_items'        => 'Добавить или удалить',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Categories',
			'search_items'               => 'Поиск',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No items',
			'items_list'                 => 'Список городов',
			'items_list_navigation'      => 'Навигация по списку',
		);
		$rewrite = array(
			'slug'                       => 'city',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'city', array( 'estate' ), $args );

	}

}
