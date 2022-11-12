import './style.scss';
import React from "react";

const Projects = ({ projects }) => (
    
    projects.map((project, index) => (
        <div className="card" id="card" key={index}>
            <section className="card--header">
                <h2 className="card--title" id="title">{project.title}</h2>
                <section className="card--picture" id="picture">
                    <img src={ `media/cache/thumb/assets/media/${project.picture}` } alt={project.title} />
                </section>
                <section className="card--date">
                    <span id="date">{project.date}</span>
                </section>
            </section>
            <section className="card--content">
                <section className="card--techno" id="techno">
                    {project.technos.map((techno, index) => (
                        <span className="card--span" id="span" key={index}>{techno.name}</span>
                    ))}
                </section>
                <section className="card--text">
                    <p id="text">{project.desciption}</p>
                </section>
            </section>
            <section className="card--footer" id="web">
                {project.links.map((link, index) => (
                    <a className="card--links" href={link.link} key={index}> {link.link}</a>
                ))}
            </section>
        </div>
    ))
    
);

                


export default Projects;