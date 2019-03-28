<?php
/**
 * Created by Javier Misat
 * Company: Innovamos
 * Description:
 * Date: 25/03/2019
 * Time: 1:30 AM
 */


// Prevenir multiples envíos de WPCF7 forms
add_action('wp_footer', 'validar_envio_cf7');

function validar_envio_cf7()
{
    ?>
    <script type="text/javascript">
        let disableSubmit = false;
        let objInput = null;
        let enviarValue = null;

        try {
            objInput = document.querySelector('.wpcf7-submit');
            enviarValue = objInput.value;
        } catch (e) {
            objInput = document.querySelector('.wpcf7 button[type="submit"]');
            enviarValue = objInput.textContent;
        }

        objInput.addEventListener('click', function (e) {
            objInput.setAttribute('value', 'Enviando...');
            objInput.textContent = 'Enviando...';
            if (disableSubmit == true) {
                e.preventDefault();
                return false;
            }
            disableSubmit = true;
            return true;
        });

        let wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7submit', function (event) {

            objInput.setAttribute('value', enviarValue);
            objInput.textContent = enviarValue;
            disableSubmit = false;

        }, false);
    </script>
    <?php
}