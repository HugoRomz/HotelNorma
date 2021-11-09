<?php

    function base_url()
    {
        return BASE_URL;
    }
    function media(){
        return BASE_URL."Assets";
    }
    function headerAdmin($data="")
    {
        $view_header = "Views/template/header_admin.php";
        require_once ($view_header);    
    }
    function footerAdmin($data="")
    {
        $view_footer = "Views/template/footer_admin.php";
        require_once ($view_footer);    
    }
    function getModal(String $nameModal,$data)
    {
        $view_modal = "Views/template/Modals/{$nameModal}.php";
        require_once $view_modal;
    }

    //Muestra información formateada
	function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }

     //Genera un token
     function token()
     {
         $r1 = bin2hex(random_bytes(10));
         $r2 = bin2hex(random_bytes(10));
         $r3 = bin2hex(random_bytes(10));
         $r4 = bin2hex(random_bytes(10));
         $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
         return $token;
     }

     function idCliente()
     {
         $r1 = bin2hex(random_bytes(2));
         $token = 'HN-'.$r1;
         return $token;
     }
    
    function passGenerator($length = 10)
    {
        $pass = "";
        $longitudPass = $length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for ($i=1; $i < $longitudPass; $i++) { 
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    function formatmoney($cantidad)
    {
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }

?>