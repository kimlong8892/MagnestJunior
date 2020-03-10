<?php


namespace Magenest\ChapterFive\Ui\DataProvider\Product\Listing\Modifier;

use Magento\Backend\Model\Auth\Session as AdminSession;

class Column implements \Magento\Ui\DataProvider\Modifier\ModifierInterface
{
    protected $adminSession;
    public function __construct
    (
        AdminSession $adminSession
    )
    {
        $this->adminSession = $adminSession;
    }

    public function modifyMeta(array $meta)
    {
        $adminUser = $this->adminSession;
        $firstName = $adminUser->getUser()->getFirstName();
        if(!($firstName[0] >= 'A' && $firstName[0] <= 'M') && !($firstName[0] >= 'a' && $firstName[0] <= 'm')){
            $meta = array_replace_recursive(
                $meta,
                [
                    'product_columns' => [
                        'children' => [
                            'customer_group'    => [
                                'arguments' => [
                                    'data' => [
                                        'config' => [
                                            'componentDisabled' => true,
                                            'componentType' => 'column'
                                        ],
                                    ],
                                ],
                            ],
                        ]
                    ],
                ]
            );
        }
        return $meta;
    }
    public function modifyData(array $data)
    {
        return $data;
    }
}
