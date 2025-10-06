<?php

namespace App\Helpers;

class SessionSweetAlert
{
    /**
     * Crea una sesión tipo toast con SweetAlert2. 
     *
     * @param string $icon
     * @param string $title
     * @return void
     */
    public static function flashSwalToast(string $icon, string $title): void
    {
        session()->flash('swal-toast', [
            'icon' => $icon,
            'title' => $title,
        ]);
    }

    /**
     * Crea una sesión con SweetAlert2.
     *
     * @param string $icon
     * @param string $title
     * @param string|null $text
     * @return void
     */

    public static function flashSwal(string $icon, string $title, string|null $text): void
    {
        session()->flash('swal', [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ]);
    }
}
