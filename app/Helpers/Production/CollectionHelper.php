<?php namespace App\Helpers\Production;

use App\Helpers\CollectionHelperInterface;

class CollectionHelper implements CollectionHelperInterface
{

    public function getSelectOptions($collection)
    {
        return $collection->lists('name', 'id')->toArray();
    }

}
