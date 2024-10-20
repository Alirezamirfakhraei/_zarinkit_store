<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Ecommerce\Models\Product;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Language\Models\LanguageMeta;
use Botble\Marketplace\Models\Store;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Menu;

class MenuSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en_US' => [
                [
                    'name'     => 'Main menu',
                    'slug'     => 'main-menu',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'    => 'Home',
                            'url'      => '/',
                            'icon_font' => 'fi-rs-home',
                            'children' => [
                                [
                                    'title'          => 'Home 1',
                                    'reference_id'   => 1,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Home 2',
                                    'reference_id'   => 2,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Home 3',
                                    'reference_id'   => 3,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Home 4',
                                    'reference_id'   => 4,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Home 5',
                                    'reference_id'   => 16,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Home 6',
                                    'reference_id'   => 17,
                                    'reference_type' => Page::class,
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Shop',
                            'url'      => '/products',
                            'children' => [
                                [
                                    'title' => 'Shop Grid - Full Width',
                                    'url'   => '/products',
                                ],
                                [
                                    'title' => 'Shop Grid - Right Sidebar',
                                    'url'   => '/products?layout=product-right-sidebar',
                                ],
                                [
                                    'title' => 'Shop Grid - Left Sidebar',
                                    'url'   => '/products?layout=product-left-sidebar',
                                ],
                                [
                                    'title'          => 'Products Of Category',
                                    'reference_id'   => 1,
                                    'reference_type' => ProductCategory::class,
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Stores',
                            'url'      => '/stores',
                            'children' => [
                                [
                                    'title' => 'Stores - Grid',
                                    'url'   => '/stores',
                                ],
                                [
                                    'title' => 'Stores - List',
                                    'url'   => '/stores?layout=stores-list',
                                ],
                                [
                                    'title' => 'Store - Detail',
                                    'url'      => str_replace(url(''), '', Store::find(1)->url),
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Product',
                            'url'      => str_replace(url(''), '', Product::find(1)->url),
                            'children' => [
                                [
                                    'title' => 'Product Right Sidebar',
                                    'url'   => str_replace(url(''), '', Product::find(1)->url),
                                ],
                                [
                                    'title' => 'Product Left Sidebar',
                                    'url'   => str_replace(url(''), '', Product::find(2)->url),
                                ],
                                [
                                    'title' => 'Product Full Width',
                                    'url'   => str_replace(url(''), '', Product::find(3)->url),
                                ],
                            ],
                        ],
                        [
                            'title'          => 'Blog',
                            'reference_id'   => 5,
                            'reference_type' => Page::class,
                            'children'       => [
                                [
                                    'title'          => 'Blog Grid',
                                    'reference_id'   => 5,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Blog List',
                                    'reference_id'   => 13,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Blog Big',
                                    'reference_id'   => 14,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Blog Wide',
                                    'reference_id'   => 15,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title' => 'Single Post',
                                    'url'   => str_replace(url(''), '', Post::find(1)->url),
                                    'children'       => [
                                        [
                                            'title' => 'Single Post Right Sidebar',
                                            'url'   => str_replace(url(''), '', Post::find(1)->url),
                                        ],
                                        [
                                            'title' => 'Single Post Left Sidebar',
                                            'url'   => str_replace(url(''), '', Post::find(2)->url),
                                        ],
                                        [
                                            'title' => 'Single Post Full Width',
                                            'url'   => str_replace(url(''), '', Post::find(3)->url),
                                        ],
                                        [
                                            'title' => 'Single Post with Product Listing',
                                            'url'   => str_replace(url(''), '', Post::find(4)->url),
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title'          => 'FAQ',
                            'reference_id'   => 18,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name'     => 'Header menu',
                    'slug'     => 'header-menu',
                    'location' => 'header-navigation',
                    'items'    => [
                        [
                            'title'          => 'About Us',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Order Tracking',
                            'url'   => '/orders/tracking',
                        ],
                    ],
                ],
                [
                    'name'  => 'Product categories',
                    'slug'  => 'product-categories',
                    'items' => [
                        [
                            'title'          => 'Men',
                            'reference_id'   => 1,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Women',
                            'reference_id'   => 2,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Accessories',
                            'reference_id'   => 3,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Shoes',
                            'reference_id'   => 4,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Denim',
                            'reference_id'   => 5,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Dress',
                            'reference_id'   => 6,
                            'reference_type' => ProductCategory::class,
                        ],
                    ],
                ],
                [
                    'name'  => 'Information',
                    'slug'  => 'information',
                    'items' => [
                        [
                            'title'          => 'Contact Us',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'About Us',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Cookie Policy',
                            'reference_id'   => 8,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Terms & Conditions',
                            'reference_id'   => 9,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Returns & Exchanges',
                            'reference_id'   => 10,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Shipping & Delivery',
                            'reference_id'   => 11,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Privacy Policy',
                            'reference_id'   => 12,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name'  => 'Company',
                    'slug'  => 'company',
                    'items' => [
                        [
                            'title'          => 'About us',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Affiliate',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'Career',
                            'url'   => '#',
                        ],
                        [
                            'title'          => 'Contact us',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Menu chính',
                    'slug'     => 'menu-chinh',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'    => 'Trang chủ',
                            'url'      => '/',
                            'children' => [
                                [
                                    'title'          => 'Trang chủ 1',
                                    'reference_id'   => 1,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Trang chủ 2',
                                    'reference_id'   => 2,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Trang chủ 3',
                                    'reference_id'   => 3,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Trang chủ 4',
                                    'reference_id'   => 4,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Trang chủ 5',
                                    'reference_id'   => 16,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Trang chủ 6',
                                    'reference_id'   => 17,
                                    'reference_type' => Page::class,
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Bán hàng',
                            'url'      => '/products',
                            'children' => [
                                [
                                    'title' => 'Tất cả sản phẩm',
                                    'url'   => '/products',
                                ],
                                [
                                    'title'          => 'Danh mục sản phẩm',
                                    'reference_id'   => 1,
                                    'reference_type' => ProductCategory::class,
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Cửa hàng',
                            'url'      => '/stores',
                            'children' => [
                                [
                                    'title' => 'Cửa hàng - Grid',
                                    'url'   => '/stores',
                                ],
                                [
                                    'title' => 'Cửa hàng - List',
                                    'url'   => '/stores?layout=stores-list',
                                ],
                                [
                                    'title' => 'Cửa hàng - Detail',
                                    'url'      => str_replace(url(''), '', Store::find(1)->url),
                                ],
                            ],
                        ],
                        [
                            'title'    => 'Sản phẩm',
                            'url'      => '#',
                            'children' => [
                                [
                                    'title' => 'Sản phẩm Sidebar phải',
                                    'url'   => str_replace(url(''), '', Product::find(1)->url),
                                ],
                                [
                                    'title' => 'Sản phẩm Sidebar trái',
                                    'url'   => str_replace(url(''), '', Product::find(2)->url),
                                ],
                                [
                                    'title' => 'Sản phẩm full width',
                                    'url'   => str_replace(url(''), '', Product::find(3)->url),
                                ],
                            ],
                        ],
                        [
                            'title'          => 'Tin tức',
                            'reference_id'   => 5,
                            'reference_type' => Page::class,
                            'children'       => [
                                [
                                    'title'          => 'Tin tức Sidebar phải',
                                    'reference_id'   => 5,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Tin tức Sidebar trái',
                                    'reference_id'   => 13,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title' => 'Bài viết Sidebar phải',
                                    'url'   => str_replace(url(''), '', Post::find(1)->url),
                                ],
                                [
                                    'title' => 'Bài viết Sidebar trái',
                                    'url'   => str_replace(url(''), '', Post::find(2)->url),
                                ],
                                [
                                    'title' => 'Bài viết Full Width',
                                    'url'   => str_replace(url(''), '', Post::find(3)->url),
                                ],
                                [
                                    'title' => 'Bài viết kèm sản phẩm',
                                    'url'   => str_replace(url(''), '', Post::find(4)->url),
                                ],
                            ],
                        ],
                        [
                            'title'          => 'FAQ',
                            'reference_id'   => 18,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name'     => 'Menu trên cùng',
                    'slug'     => 'menu-tren-cung',
                    'location' => 'header-navigation',
                    'items'    => [
                        [
                            'title'          => 'Về Chúng Tôi',
                            'reference_id'   => 8,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Theo Dõi Đơn Hàng',
                            'url'   => '/orders/tracking',
                        ],
                    ],
                ],
                [
                    'name'  => 'Product categories',
                    'slug'  => 'danh-muc-san-pham',
                    'items' => [
                        [
                            'title'          => 'Sữa',
                            'reference_id'   => 1,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Quần áo và làm đẹp',
                            'reference_id'   => 2,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Đồ chơi thú cưng',
                            'reference_id'   => 3,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Nguyên liệu làm bánh',
                            'reference_id'   => 4,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Trái cây tươi',
                            'reference_id'   => 5,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title'          => 'Rượu & Đồ uống',
                            'reference_id'   => 6,
                            'reference_type' => ProductCategory::class,
                        ],
                    ],
                ],
                [
                    'name'  => 'Information',
                    'slug'  => 'thong-tin',
                    'items' => [
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Về chúng tôi',
                            'reference_id'   => 8,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Điều khoản & quy định',
                            'reference_id'   => 9,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Chính sách đổi trả',
                            'reference_id'   => 10,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Chính sách vận chuyển',
                            'reference_id'   => 11,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Chính sách bảo mật',
                            'reference_id'   => 12,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name'  => 'Công ty',
                    'slug'  => 'cong-ty',
                    'items' => [
                        [
                            'title'          => 'Về chúng tôi',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Tiếp thị liên kết',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'Tuyển dụng',
                            'url'   => '#',
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        MetaBoxModel::where('reference_type', MenuNode::class)->delete();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::create([
                        'menu_id'  => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = LanguageMeta::where([
                        'reference_id'   => $locale == 'en_US' ? $menu->id : $menu->id + 3,
                        'reference_type' => MenuLocation::class,
                    ])->value('lang_meta_origin');

                    LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
                }

                foreach ($item['items'] as $menuNode) {
                    $this->createMenuNode($index, $menuNode, $locale, $menu->id);
                }

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($menu, $locale, $originValue);
            }
        }

        Menu::clearCacheMenuItems();
    }

    /**
     * @param int $index
     * @param array $menuNode
     * @param string $locale
     * @param int $menuId
     * @param int $parentId
     */
    protected function createMenuNode(int $index, array $menuNode, string $locale, int $menuId, int $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
