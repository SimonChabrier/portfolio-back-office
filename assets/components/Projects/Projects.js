import './style.scss';
import React from "react";

const Projects = ({ projects }) => (
    
        projects.map((project, index) => (
            <div className="project" key={index}>
                <h1>{project.title}</h1>
                <p>{project.id}</p>
                <img src={ `media/cache/thumb/assets/media/${project.picture}` } alt={project.title} />
                <p>{project.desciption}</p>
                <ul>
                    {project.links.map((link, index) => (
                        <li key={index}>
                        <a className="project--links" href={link.link}> {link.link}</a>
                        </li>
                    ))}
                </ul>
                <ul>
                    {project.technos.map((techno, index) => (
                        <li key={index}>
                        {techno.name}
                        </li>
                    ))}
                </ul>
            </div>
        ))
);



export default Projects;