<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>{{__('translation.Dashboard')}}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#transactions" {{ $section == 'transactions' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text">{{__('translation.transactions')}}</span>
                </a>

                <div class="collapse {{ $section == 'transactions' ? 'show' : '' }}" id="transactions">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'tstats') class="active " @endif>
                            <a href="{{ route('transactions.stats')  }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>{{__('translation.Statistics')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'transactions') class="active " @endif>
                            <a href="{{ route('transactions.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{__('translation.All')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'sales') class="active " @endif>
                            <a href="{{ route('sales.index')  }}">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>{{__('translation.Sales')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'expenses') class="active " @endif>
                            <a href="{{ route('transactions.type', ['type' => 'expense'])  }}">
                                <i class="tim-icons icon-coins"></i>
                                <p>{{__('translation.Expenses')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'incomes') class="active " @endif>
                            <a href="{{ route('transactions.type', ['type' => 'income'])  }}">
                                <i class="tim-icons icon-credit-card"></i>
                                <p>{{__('translation.Income')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'transfers') class="active " @endif>
                            <a href="{{ route('transfer.index')  }}">
                                <i class="tim-icons icon-send"></i>
                                <p>{{__('translation.transfers')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'payments') class="active " @endif>
                            <a href="{{ route('transactions.type', ['type' => 'payment'])  }}">
                                <i class="tim-icons icon-money-coins"></i>
                                <p>{{__('translation.payments')}}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#inventory" {{ $section == 'inventory' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-app"></i>
                    <span class="nav-link-text">{{__('translation.Inventory')}}</span>
                </a>

                <div class="collapse {{ $section == 'inventory' ? 'show' : '' }}" id="inventory">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'istats') class="active " @endif>
                            <a href="{{ route('inventory.stats') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>{{__('translation.Statistics')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'products') class="active " @endif>
                            <a href="{{ route('products.index') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{__('translation.kazkan')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'kenzhekhan') class="active " @endif>
                            <a href="{{ route('kenzhekhan.index') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{__('translation.kenzhekhan')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'categories') class="active " @endif>
                            <a href="{{ route('categories.index') }}">
                                <i class="tim-icons icon-tag"></i>
                                <p>{{__('translation.categories')}}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'receipts') class="active " @endif>
                            <a href="{{ route('receipts.index') }}">
                                <i class="tim-icons icon-paper"></i>
                                <p>{{__('translation.Receipts')}}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li @if ($pageSlug == 'clients') class="active " @endif>
                <a href="{{ route('clients.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{__('translation.Clients')}}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'providers') class="active " @endif>
                <a href="{{ route('providers.index') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>{{__('translation.Providers')}}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'methods') class="active " @endif>
                <a href="{{ route('methods.index') }}">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>{{__('translation.Methods_and_Accounts')}}</p>
                </a>
            </li>
            @can('manage_users')
                <li>
                    <a data-toggle="collapse" href="#users" {{ $section == 'users' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-badge" ></i>
                        <span class="nav-link-text">{{__('translation.Users')}}</span>
                    </a>

                    <div class="collapse {{ $section == 'users' ? 'aria-expanded=true' : '' }}" id="users">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'profile') class="active " @endif>
                                <a href="{{ route('profile.edit')  }}">
                                    <i class="tim-icons icon-badge"></i>
                                    <p>{{__('translation.My_profile')}}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users-list') class="active " @endif>
                                <a href="{{ route('users.index')  }}">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>{{__('translation.Manage_Users')}}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users-create') class="active " @endif>
                                <a href="{{ route('users.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>
                                    <p>{{__('translation.New_user')}}</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('access_translator')
                <li>
                    <a href="{{ route('translations.index')  }}">
                        <i class="tim-icons icon-caps-small"></i>
                        <p>{{__('translation.Translation_Manager')}}</p>
                    </a>
                </li>
            @endcan
            <li @if ($pageSlug == 'Search query') class="active " @endif>
                <a href="{{route('theme.index')}}">
                    <i class="tim-icons icon-zoom-split"></i>
                    <p>{{__('translation.search')}}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'chat') class="active " @endif>
                <a href="/chat">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{__('translation.chat')}}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
