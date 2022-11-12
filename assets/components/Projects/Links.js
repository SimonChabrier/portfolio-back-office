import React from "react";
import Link from "./Link";

const Links = ({ links, id }) => {
    return (
        links.map((link) => (
            // <Link link={link} key={id} />
            <li key={id}>
                <a href={link.link}>{link.link}</a>
            </li>
        ))
    )
} 

export default Links;

