<?php

class HogeNet
{
    /**
     * POST����患
     * @param string $sURL
     * @param array $params
     * @return string
     */
    public static function file_post_contents($sURL, $params)
    {
        if (Empty($sURL) || Empty($params)) return "ERROR:��������ł��B";
        if (!Is_Array($params)) return "ERROR:�������͔z��ł���K�v������܂��B";

        $header = array(
            "Content-Type: application/x-www-form-urlencoded",
            "Content-Length: ".strlen(http_build_query($params))
        );


        $aOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => implode("\r\n", $header),
                'content' => http_build_query($params),
            ),
        );

        return file_get_contents($sURL, false, stream_context_create($aOptions));
    }
}