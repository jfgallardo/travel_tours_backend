<?php

namespace App\Services\Moblix;

use App\Services\BookingService;
use App\Services\Pagarme\PagarmeService;
use Illuminate\Support\Facades\Http;

class GravarService
{
    /**
     * @param AuthService $authService
     * @param PagarmeService $pagarmeService
     */
    public function __construct(private AuthService $authService, private PagarmeService $pagarmeService, private BookingService $bookingService)
    {
        $authService->autenticar();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->authService->getToken(),
        ];
        $this->authService->setHeaders($headers);
    }

    public function Gravar(array $data)
    {
        //llamar a pagarmeService y ver si funciona GetCustomers()
        //$wasPayed = $this->pagarmeService->Transaction();
        $record = Http::withHeaders($this->authService->getHeaders())->post(env('GRAVAR_MOBLIX'), $data);
        $completed = $record->json();

        if (isset($completed['Data']) && !empty($completed['Data'])) {
            $booking = [
                'user_id' => auth()->user()->id,
                'order_id' => $completed['Data'][0]['IdOrder'],
            ];

            $this->bookingService->createBooking($booking);
        }

        return $completed;
    }

    //Obtenha os detalhes do seu pedido
    public function DetalhesPedido(string $order): mixed
    {
        $orderResult = Http::withHeaders($this->authService->getHeaders())->get('https://orders-prod.happystone-31ae7f2c.brazilsouth.azurecontainerapps.io/api/order?Id=' . $order);

        return $orderResult->json();
    }
}
