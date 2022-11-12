import './style.scss';
import React from "react";

const Projects = ({ projects }) => (
    
        projects.map((project, index) => (
            <div className="card" id="card" key={index}>
            <div className="card--header">
                <h2 className="card--title" id="title">{project.title}</h2>
                <div className="card--picture" id="picture">
                <img src={ `media/cache/thumb/assets/media/${project.picture}` } alt={project.title} />
                </div>
                <div className="card--date">
                    <span id="date">{project.date}</span>
                </div>
            </div>
            <div className="card--content">
                <div className="card--techno" id="techno">
                {project.technos.map((techno, index) => (
                    <span className="card--span" id="span" key={index}>{techno.name}</span>
                ))}
                </div>
                <div className="card--text">
                    <p id="text">{project.desciption}</p>
                </div>
            </div>
            <div className="card--footer" id="web">
                {project.links.map((link, index) => (
                    <a className="project--links" href={link.link} key={index}> {link.link}</a>
                ))}
            </div>
        </div>
        ))
);

                


export default Projects;