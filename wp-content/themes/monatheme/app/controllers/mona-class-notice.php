<?php 
class Notice {

    /**
     * Undocumented function
     *
     * @param string $ststus
     * @param string $message
     * @param string $rederect
     * @param string $responses
     * @return void
     */
    public static function Error( string $ststus = '404', string $message = 'Error', $rederect = '', $responses = '' ) 
    {
        $messages = [
            'status'    => esc_attr( $ststus ),
            'message'   => esc_html( $message ),
            'rederect'  => esc_url( $rederect ),
            'responses' => $responses,
            'success'   => false,
        ];
        return $messages;
    }

    /**
     * Undocumented function
     *
     * @param string $ststus
     * @param string $message
     * @param string $rederect
     * @param string $responses
     * @return void
     */
    public static function Success( string $ststus = '200', string $message = 'Get data success', $rederect = '', $responses = '' ) 
    {
        $messages = [
            'status'    => esc_attr( $ststus ),
            'message'   => esc_html( $message ),
            'rederect'  => esc_url( $rederect ),
            'responses' => $responses,
            'success'   => true,
        ];
        return $messages;
    }

}