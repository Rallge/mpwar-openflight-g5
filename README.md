## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. Clone this project: `git@github.com:lucianogarciaz/mpwar.git`
3. Move to the project folder: `cd mpwar`

### 🔥 Application execution

1. Install all the dependencies and bring up the project with Docker executing: `make build`
2. `make start-service`
3. Then you'll have:
   1. [health-check](apps/openflight/backend/src/Controller/Healthcheck): http://localhost:8030/health-check
   2. PUT [register-user](apps/openflight/backend/src/Controller/Users): http://localhost:8030/register-user/e617f839-c8ee-4580-a0d3-6dceab0f3293 + body