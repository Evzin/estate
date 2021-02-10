.PHONY: logs

uID := $(shell id -u)

shell:
	docker-compose exec main go-www

log:
	docker-compose logs --tail 100 -f main

code-check:
	docker-compose exec --user=www-data main bash -c "source ~/.bashrc; phpcs;"
	
code-stats:
	docker-compose exec --user=www-data main bash -c "source ~/.bashrc; phpcs --report=summary,gitblame;"

root:
	docker-compose exec main bash

fix-permissions:
	sudo chown -R $$USER:$$USER ./*

fix-uid:
	docker-compose exec main usermod -u $(uID) www-data

logs: log
