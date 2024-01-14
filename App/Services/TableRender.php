<?php

namespace App\Services;

class TableRender
{
    public static function render($objs, $conditions = [], $type = "")
    {
        $table = "<table class='table align-items-center mb-0'><thead><tr>";

        if (empty(!$objs)) {
            $getters = array_filter(get_class_methods($objs[0]), function ($method) {
                return 'get' === substr($method, 0, 3);
            });
        } else {
            $getters = [];
        }

        # -> Render <th> :
        foreach ($conditions as $column) :
            $table .= "<th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>$column</th>";
        endforeach;


        $table .= "<th colspan='2' class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Action</th>";
        $table .= "</tr></thead><tbody>";

        # -> Render <tr> :
        foreach ($objs as $obj) :
            $table .= "<tr>";

            foreach ($getters as $getter) :
                $property = strtolower(str_replace("get", "", $getter));
                if (!in_array(ucfirst($property), $conditions)) continue;

                $value = htmlspecialchars($obj->$getter());
                $table .= "<td><p class='text-xs font-weight-bold mb-0'>$value</p></td>";
            endforeach;

            $getId = $getters[0];
            $id = htmlspecialchars($obj->$getId());
            $table .= "<input type='hidden' class='id' name='id' value='$id' />";
            if ($type) :
                $table .= "<input type='hidden' class='type' name='type' value='$type' />";
            endif;
            $table .= "<td data-bs-toggle='modal' data-bs-target='#updateModal'>
                <button style='cursor:pointer;margin:0;padding:6px 8px' onclick='fillModal(event)' class='btn btn-info'>Edit</button>
            </td>";
            $table .= "
            <td class='align-middle'>
                <form action='/admin/delete' method='post'>
                    <input style='cursor:pointer;margin:0;padding:6px 8px' class='btn btn-danger' type='submit' value='Delete' />
                    <input type='hidden' name='id' value='$id' />
                    <input type='hidden' name='type' value='$type' />
                </form>
            </td></tr>
            ";
        endforeach;

        $table .= "</tbody></table>";
        return $table;
    }
}
