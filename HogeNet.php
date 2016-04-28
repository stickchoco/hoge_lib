<?php

class HogeNet
{
    /**
     * POSTするよぅ
     * @param string $sURL
     * @param array $params
     * @return string
     */
    public static function file_post_contents($sURL, $params)
    {
        if (Empty($sURL) || Empty($params)) return "ERROR:引数が空です。";
        if (!Is_Array($params)) return "ERROR:第二引数は配列である必要があります。";

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