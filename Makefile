docker-run:
	docker-compose up -d
.PHONY: docker-run

docker-run-build:
	docker-compose up -d --build
.PHONY: docker-run-build

docker-restart:
	docker-compose restart
.PHONY: docker-restart


docker-bash:
	docker exec -it hr-app-8.3 bash
.PHONY: docker-bash
