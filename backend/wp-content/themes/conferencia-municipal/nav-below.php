<?php $args = array(
'prev_text' => sprintf( esc_html__( '%s older', 'conferenciamunicipal' ), '<span class="meta-nav">&larr;</span>' ),
'next_text' => sprintf( esc_html__( 'newer %s', 'conferenciamunicipal' ), '<span class="meta-nav">&rarr;</span>' )
);
the_posts_navigation( $args );
