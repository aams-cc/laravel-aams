<?php

namespace Aams\LaravelAams\Objects;

use Aams\LaravelAams\Collections\AmountCollection;
use Aams\LaravelAams\Collections\RewardCollection;
use Aams\LaravelAams\Enums\BonusDepositIndex;
use Aams\LaravelAams\Enums\BonusDepositType;
use Aams\LaravelAams\Enums\BonusGroup;
use Aams\LaravelAams\Enums\WageringType;
use Illuminate\Contracts\Support\Arrayable;

class Bonus implements Arrayable
{
    public function __construct(
        public string             $id,
        public string             $title,
        public AmountCollection $minDeposit,
        public BonusGroup         $group,
        public WageringType       $wageringType,
        public RewardCollection   $rewards,
        public ?string            $code = null,
        public ?BonusDepositType  $depositType = null,
        public ?BonusDepositIndex $depositIndex = null,
        public ?int               $wagering = null,
        public ?int               $expirationTime = null,
    )
    {
        //
    }

    public static function from(array $data): Bonus
    {
        $rewards = new RewardCollection();
        if(isset($data['match_reward']) && $data['match_reward']) {
            $rewards->push(
                MatchReward::from($data['match_reward'])
            );
        }

        if(isset($data['spins_reward']) && $data['spins_reward']) {
            $rewards->push(
                SpinsReward::from($data['spins_reward'])
            );
        }

        return new Bonus(
            id: $data['id'],
            title: $data['title'],
            minDeposit: new AmountCollection($data['min_deposit'])
                ->filter(
                    fn(array $amount) => is_numeric($amount['amount']) && $amount['amount'] > 0
                )
                ->map(
                    fn(array $amount) => Amount::from($amount['amount'], $amount['currency']),
                ),
            group: BonusGroup::from($data['group']),
            wageringType: WageringType::from($data['wagering_type']),
            rewards: $rewards,
            code: $data['code'],
            depositType: BonusDepositType::from($data['deposit_type']),
            depositIndex: BonusDepositIndex::tryFrom($data['deposit_index']) ?? null,
            wagering: $data['wagering'],
            expirationTime: $data['expiration_time'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'code' => $this->code,
            'group' => $this->group,
            'deposit_type' => $this->depositType,
            'deposit_index' => $this->depositIndex,
            'min_deposit' => $this->minDeposit->toArray(),
            'wagering' => $this->wagering,
            'wagering_type' => $this->wageringType,
            'expiration_time' => $this->expirationTime,
            'rewards' => $this->rewards->toArray(),
        ];
    }
}
