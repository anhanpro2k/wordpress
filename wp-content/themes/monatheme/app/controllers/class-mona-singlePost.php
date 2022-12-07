<?php
class singlePost extends Posts {

    private $id;

    public function __construct( int $id ) 
    {
        $this->id = $id;
    }

    /**
     * Undocumented function
     *
     * @param string $size
     * @return void
     */
    public function getImage( $size = 'item-post-image' ) 
    {
        $post_image = get_the_post_thumbnail( $this->id, $size, ['class' => 'item-post-image'] );
        if ( empty ( $post_image ) ) {
            $post_image = '<img src="'.get_template_directory_uri(  ).'/public/images/default-thumbnail.jpg" alt="defaut-post-image" class="default-img">';
        }
        return $post_image;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param boolean $single
     * @return void
     */
    public function getMeta( $key = '', $single = true ) 
    {
        $getValue = get_post_meta( $this->id, esc_attr( $key ), $single );
        return $getValue;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param string $value
     * @param boolean $single
     * @return void
     */
    public function createMeta( $key = '', $value = '', $single = true ) 
    {
        update_post_meta( $this->id, esc_attr( $key ), $value );
        $getValue = get_post_meta( $this->id, esc_attr( $key ), $single );
        return $getValue;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function deteleMeta( $key = '' ) 
    {
        delete_post_meta( $this->id, esc_attr( $key ) );
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function updateMeta( $key = '', $value = '', $single = true ) 
    {
        update_post_meta( $this->id, esc_attr( $key ), $value );
        $getValue = get_post_meta( $this->id, esc_attr( $key ), $single );
        return $getValue;
    }
} 