<?php

class FlashMessage
{

    public static function setFlash($pesan, $aksi, $tipeColor, $table_aksi)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'colortipe' => $tipeColor,
            'table_aksi' => $table_aksi,
            'idlogin'
        ];
    }

    public static function setSweetAlrert($pesan, $data, $icon)
    {
        $_SESSION['alert'] = [
            'pesan' => $pesan,
            'data' => $data,
            'icon' => $icon,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['colortipe'] . ' alert-dismissible fade show" role="alert">
                Data ' . $_SESSION['flash']['table_aksi'] . ' <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            ';

            unset($_SESSION['flash']);
        }
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
