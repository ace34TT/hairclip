CREATE OR REPLACE VIEW sheet_data AS
SELECT o.id AS order_id,
    o.payment_intent_id,
    o.status,
    o.quantity AS total_by_orders,
    o.amount,
    o.customer_first_name,
    o.customer_last_name,
    o.customer_emil,
    o.shipping_address,
    o.billing_address,
    od.id AS order_detail_id,
    p.id AS product_id,
    p.name,
    od.quantity AS total_by_details,
    o.created_at
FROM order_details od
    INNER JOIN orders o ON o.id = od.order_id
    INNER JOIN products p ON p.id = od.product_id;
--
CREATE OR REPLACE VIEW stock_status_view AS
SELECT sm.product_id,
    COALESCE(
        (
            SELECT SUM(quantity)
            FROM stock_movements sm2
            WHERE sm2.product_id = sm.product_id
                AND type = 0
        ),
        0
    ) AS move_in,
    COALESCE(
        (
            SELECT SUM(quantity)
            FROM stock_movements sm2
            WHERE sm2.product_id = sm.product_id
                AND type = 1
        ),
        0
    ) AS move_out,
    (
        COALESCE(
            (
                SELECT SUM(quantity)
                FROM stock_movements sm2
                WHERE sm2.product_id = sm.product_id
                    AND type = 0
            ),
            0
        ) - COALESCE(
            (
                SELECT SUM(quantity)
                FROM stock_movements sm2
                WHERE sm2.product_id = sm.product_id
                    AND type = 1
            ),
            0
        )
    ) AS current_status
FROM stock_movements sm
    INNER JOIN products p ON p.id = sm.product_id
GROUP BY sm.product_id;
--
CREATE OR REPLACE
VIEW daily_statistic_view AS
SELECT DATE(o.created_at) AS date,
    COUNT(*) AS count
FROM (
        SELECT DATE(NOW() - INTERVAL n DAY) AS created_at
        FROM (
                SELECT 0 AS n
                UNION ALL
                SELECT 1
                UNION ALL
                SELECT 2
                UNION ALL
                SELECT 3
                UNION ALL
                SELECT 4
                UNION ALL
                SELECT 5
                UNION ALL
                SELECT 6
            ) numbers
    ) dates
    LEFT JOIN orders o ON DATE(o.created_at) = dates.created_at
GROUP BY date
ORDER BY date DESC;