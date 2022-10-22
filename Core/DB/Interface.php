<?php

namespace System\Libs;

interface IntrFace
{

    public function create( $query );

    public function read( $query , $data );

    public function update( $query, $data );

    public function delete( $query , $data) ;
}
