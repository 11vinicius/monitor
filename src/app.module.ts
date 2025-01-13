import { Module } from '@nestjs/common';
import { UserModule } from './users/user.module';
import { PropertiesModule } from './properties/properties.module';
import { AuthModule } from './auth/Auth.module';
import { AuthGuard } from './auth/Auth.guard';
import { CattleModule } from './cattle/cattle.module';


@Module({
  imports: [UserModule, PropertiesModule, AuthModule, CattleModule],
  controllers: [],
  providers: [AuthGuard],
})
export class AppModule {}
