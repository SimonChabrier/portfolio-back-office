import React from "react";
import Links from "./Links";

const Project = ({ title, description, image , links, id }) => {

    const media = "media/cache/thumb/assets/media/" + image  + '.webp';

    return (
        <div className="project">
            <h1>{title}</h1>
            <p>{description}</p>
            <img src= {media} alt={title} />
            <Links links={links} id={id} />
        </div>
    );
};

export default Project;