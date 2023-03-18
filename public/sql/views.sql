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
    INNER JOIN products p ON p.id = od.product_id
