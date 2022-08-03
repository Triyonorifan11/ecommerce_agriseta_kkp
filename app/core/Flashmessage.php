<?php

class FlashMessage
{



    public static function setSweetAlrert($pesan, $data, $icon)
    {
        $_SESSION['alert'] = [
            'pesan' => $pesan,
            'data' => $data,
            'icon' => $icon,
        ];
    }



    public static function alertSweet()
    {
        if (isset($_SESSION['alert'])) {
            echo "
            <script>
                Swal.fire({
                    icon: '" . $_SESSION['alert']['icon'] . "',
                    title: '" . $_SESSION['alert']['pesan'] . "',
                    text: '" . $_SESSION['alert']['data'] . "',
                })
            </script>
            ";

            unset($_SESSION['alert']);
        }
    }
}
