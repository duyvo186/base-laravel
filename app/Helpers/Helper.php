<?php

namespace App\Helpers;

class Helper
{
    public static function category($categories, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {
                $html .= '
                           <tr>
                           <td> ' . $category->id . ' </td>
                           <td> ' . $char . $category->name . ' </td>
                           <td> ' . $category->active . ' </td>
                           <td> ' . $category->updated_at . ' </td>
                           <td>&nbsp;</td>
                           <td>

                           <form action="category/' . $category->id . '"  method="post">
                          ' . method_field('DELETE') . '
                          ' . csrf_field() . '
                          <button type="submit" style="float: right;margin-left: 20px;" class="btn btn-danger" >
                                Delete
                            </button>
                        </form>
                           <a  class="btn btn-info" href="category/' . $category->id . '">Edit</a>
                           </td>
                           </td>
                           </tr>
                                      ';
                unset($category[$key]);
                $html .= self::category($categories, $category->id, $char . "==");
            }
        }
        return $html;
    }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0) return number_format($price);
        return ' <a href="/lien-he.html">Liên Hệ</a>';
    }
}
