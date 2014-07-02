-- DROP TABLE IF EXISTS public.tasks;
CREATE TABLE public.tasks(
	id serial NOT NULL,
	last timestamp NOT NULL,
	next timestamp NOT NULL,
	interval integer NOT NULL,
	action character varying(64) NOT NULL,
	comments character varying(255) NOT NULL,
	error text NOT NULL,
	result smallint NOT NULL,
	active smallint NOT NULL,
	created timestamp,
	modified timestamp,
	CONSTRAINT tasks_pkey PRIMARY KEY (id)
);

COMMENT ON TABLE public.tasks IS 'list of jobs for the automatic task system';
  
-- DROP INDEX public.tasks_active;
CREATE INDEX tasks_active ON public.tasks
	USING btree
	(
	  active
	)	WITH (FILLFACTOR = 90);

-- DROP INDEX public.tasks_next;
CREATE INDEX tasks_next ON public.tasks
	USING btree
	(
	  next
	)	WITH (FILLFACTOR = 90);

-- DROP INDEX public.tasks_last;
CREATE INDEX tasks_last ON public.tasks
	USING btree
	(
	  last
	)	WITH (FILLFACTOR = 90);

-- DROP INDEX public.tasks_result;
CREATE INDEX tasks_result ON public.tasks
	USING btree
	(
	  result
	)	WITH (FILLFACTOR = 90);

-- DROP INDEX public.tasks_comments;
CREATE INDEX tasks_comments ON public.tasks
	USING btree
	(
	  comments
	)	WITH (FILLFACTOR = 90);

-- DROP INDEX public.tasks_action;
CREATE INDEX tasks_action ON public.tasks
	USING btree
	(
	  action
	)	WITH (FILLFACTOR = 90);
