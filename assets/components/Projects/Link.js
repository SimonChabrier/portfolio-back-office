import React from "react";

const Link = ({link, key}) => {

    if (link !== null) {
        console.log(key);
        return (   
            <li>
                <a href={link.link}>{link.link}</a>
            </li>
        )
    }
}

export default Link;