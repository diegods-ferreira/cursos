import React from 'react';

import { 
  Container,
  Breadcrumb,
  RepoIcon,
  Stats,
  StarIcon,
  ForkIcon,
  LinkButton,
  GithubIcon,
} from './styles';
import { Link } from 'react-router-dom';

const Repo: React.FC = () => {
  return (
    <Container>
      <Breadcrumb>
        <RepoIcon />
        <Link to={`/diegods-ferreira`} className="username">
          diegods-ferreira
        </Link>
        <span>/</span>
        <Link to={`/diegods-ferreira/be-the-hero`} className="reponame">
          be-the-hero
        </Link>
      </Breadcrumb>

      <p>Um repositório qualquer.</p>

      <Stats>
        <li>
          <StarIcon />
          <b>9</b>
          <span>stars</span>
        </li>
        <li>
          <ForkIcon />
          <b>9</b>
          <span>forks</span>
        </li>
      </Stats>

      <LinkButton href={`https://github.com/diegods-ferreira/be-the-hero`}>
        <GithubIcon />
        <span>View on Github</span>
      </LinkButton>
    </Container>
  );
}

export default Repo;