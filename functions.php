<?php
/**
 * Created by Javier Misat
 * Company: Innovamos
 * Description:
 * Date: 25/03/2019
 * Time: 1:30 AM
 */

// Prevenir multiples envíos de WPCF7 forms
add_action( 'wp_footer', 'validar_envio_cf7' );

function validar_envio_cf7() {
    ?>
    <script type="text/javascript">
        var disableSubmit = false;
        document.querySelector('input.wpcf7-submit[type="submit"]').addEventListener('click', function() {
            document.querySelector('input[type="submit"]').setAttribute('value', 'Enviando...')
            if (disableSubmit == true) {
                return false;
            }
            disableSubmit = true;
            return true;
        });

        var wpcf7Elm = document.querySelector( '.wpcf7' );
        wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
            //document.querySelector('input[type="submit"]').setAttribute('value', 'Enviar')
            disableSubmit = false;
        }, false );
    </script>
    <?php
}


