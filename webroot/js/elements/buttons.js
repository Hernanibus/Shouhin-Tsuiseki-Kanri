/*
    Script for actions on adm user elements
 */

function hide_container( container_id, remove_class = "", hidden_class = "hidden" )
{
    // Hide the container if it exists
    if ( document.getElementById( container_id ) !== null )
    {
        let element = document.getElementById( container_id );
        element.classList.add( hidden_class );
        if( remove_class !== "" ){ element.classList.remove( remove_class ); }
    }
}

function show_container( container_id, apply_class = "", remove_class = "hidden" )
{
    // Show the container if it exists
    if ( document.getElementById( container_id ) !== null )
    {
        let element = document.getElementById( container_id );
        element.classList.remove( remove_class );
        if( apply_class !== "" ){ element.classList.add( apply_class ); }
    }
}
