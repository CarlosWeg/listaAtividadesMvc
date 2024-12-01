CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,                      -- Chave primária com incremento automático
    description VARCHAR(255) NOT NULL,         -- Descrição da tarefa
    is_completed BOOLEAN DEFAULT FALSE        -- Status de conclusão (padrão: falso)
);