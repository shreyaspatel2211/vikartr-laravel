<?php


namespace App\MenuFilters;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class SidebarFilters implements FilterInterface
{
    public function transform($item)
    {
        // Check if the item is the 'Admin' header
        if (isset($item['header']) && $item['header'] === 'Admin') {
            // Check if the user is a super admin
            if (!auth()->user()->can('is-super-admin')) {
                // Return false to hide the header
                return false;
            }
        }

        return $item;
    }
}
