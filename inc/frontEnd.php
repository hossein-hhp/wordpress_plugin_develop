<?php
    function statusName($statusDB)
    {
        switch($statusDB){
            case 0:
                return "<span class=\"text-danger\">غیر فعال</span>";
            case 1:
                return "<span class=\"text-success\">فعال</span>";
        }
    }